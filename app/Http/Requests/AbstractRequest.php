<?php

namespace App\Http\Requests;

use App\Services\Common\ResponseServices;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

/**
 * 实现场景验证
 *
 * Class AbstractRequest
 * @package App\Http\Requests
 */
class AbstractRequest extends FormRequest
{
    /**
     * 场景值
     * @var array
     */
    public $scenes = [];


    /**
     * 当前场景值
     * @var string
     */
    public $currentScene;


    /**
     * 是否自动验证
     * @var bool
     */
    public $autoValidate = true;


    /**
     * @var 验证规则
     */
    public $extendRules;


    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * 设置场景值
     *
     * @param $scene
     * @return $this
     */
    public function scene($scene)
    {
        $this->currentScene = $scene;
        return $this;
    }


    /**
     * 使用扩展rule
     *
     * @param string $name
     * @return $this
     */
    public function with($name = '')
    {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $this->extendRules[] = Str::camel($name);
            }
        } elseif (is_string($name)) {
            $this->extendRules[] = Str::camel($name);
        }

        return $this;
    }


    /**
     * 覆盖自动验证方法
     */
    public function validateResolved()
    {
        if ($this->autoValidate) {
            $this->handleValidate();
        }
    }


    /**
     * 验证方法
     *
     * @param string $scene
     */
    public function validate($scene = '')
    {
        if ($scene) {
            $this->currentScene = $scene;
        }

        $this->handleValidate();
    }


    public function getRules()
    {
        $rules = $this->container->call([$this, 'rules']);
        $newRules = [];

        if ($this->extendRules) {
            $extendRules = array_reverse($this->extendRules);
            foreach ($extendRules as $extendRule) {
                if (method_exists([$this, "{$extendRule}Rules"])) {
                    $rules = array_merge($rules, $this->container->call(
                        [$this, "{$extendRule}Rules"]
                    ));
                }
             }
        }

        if ($this->currentScene && isset($this->scenes[$this->currentScene])) {
            $sceneFields = is_array($this->scenes[$this->currentScene])
                ? $this->scenes[$this->currentScene] : explode(',', $this->scenes[$this->currentScene]);
            foreach ($sceneFields as $field) {
                if (array_key_exists($field, $rules)) {
                    $newRules[$field] = $rules[$field];
                }
            }
            return $newRules;
        }
        return $rules;
    }


    /**
     * 覆盖设置 自定义验证器
     * @param $factory
     * @return mixed
     */
    public function validator($factory)
    {
        return $factory->make(
            $this->validationData(), $this->getRules(),
            $this->messages(), $this->attributes()
        );
    }

    /**
     * 最终验证方法
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function handleValidate()
    {
        if (!$this->passesAuthorization()) {
            $this->failedAuthorization();
        }
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
            $this->failedValidation($instance);
        }
    }


    /**
     * @param Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator,
            ResponseServices::error($validator->errors()->first()));
    }
}
