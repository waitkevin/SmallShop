<template>
    <div>
        <el-dialog :title="title" :visible.sync="showModel" @click="handleOpen">
            <el-form ref="formData" :model="formData"  :rules="rules" label-width="80px">
                <el-form-item label="权限名称" prop="path">
                    <el-cascader v-model="formData.path"
                        :options="nodeTree"
                        :props="{
                            checkStrictly: true,
                            label: 'name',
                            value: 'id',
                        }"
                        clearable placeholder="请选择父级权限(不选默认为顶级权限)">
                    </el-cascader>
                </el-form-item>
                <el-form-item label="权限名称" prop="name">
                    <el-input v-model="formData.name"></el-input>
                </el-form-item>
                <el-form-item  label="权限路由" prop="router">
                    <el-input  v-model="formData.router"></el-input>
                </el-form-item>
                <el-form-item label="权限图标" prop="icons">
                    <el-input v-model="formData.icons"></el-input>
                </el-form-item>
                <el-form-item label="权限排序" prop="sort">
                    <el-input v-model="formData.sort"></el-input>
                </el-form-item>
                <el-form-item label="权限备注" prop="mark">
                    <el-input v-model="formData.mark"></el-input>
                </el-form-item>
                <el-form-item label="权限类型" prop="type">
                    <el-radio-group v-model="formData.type">
                        <el-radio label="1" value="1">菜单</el-radio>
                        <el-radio label="2" value="2">资源</el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item label="权限状态" prop="status">
                    <el-radio-group v-model="formData.status">
                        <el-radio label="1">显示</el-radio>
                        <el-radio label="2">隐藏</el-radio>
                    </el-radio-group>
                </el-form-item>

                <el-form-item>
                    <el-button type="success" size="small" @click="onSubmit('formData')">成功按钮</el-button>
                </el-form-item>

            </el-form>
        </el-dialog>
    </div>
</template>

<script>
    import nodes from '../../api/nodes';
    import tools from '../../common/tools';
    export default {
        props: {
            showModel:Boolean,
            type:Number,
            storage:Object
        },
        name: "addNode",
        data() {
            return {
                nodeTree: [],
                title: '添加 / 编辑权限',
                innerVisible: true,
                formData: {
                    name:'',
                    router: '',
                    icons:'el-icon-edit',
                    mark:'',
                    sort:'1',
                    type:'1',
                    status:'1',
                    path: [],
                },
                rules: {
                    name: [
                        { required: true, message: '请输入权限名称', trigger: 'blur' },
                        { min: 2, max: 50, message: '权限名称长度为2 ~ 50个字', trigger: 'blur' }
                    ],
                    router: [
                        { required: true, message: '请输入权限路由', trigger: 'blur' },
                        { min: 2, max: 200, message: '权限名称长度为2 ~ 200个字', trigger: 'blur' }
                    ],
                    sort: [
                        { required: true, message: '请输入权限排序', trigger: 'blur' },
                    ],
                    icons: [
                        { required: false, message: '请输入权限图标', trigger: 'blur' },
                        { min: 2, max: 200, message: '权限图标长度为2 ~ 150个字', trigger: 'blur' }
                    ],
                    mark: [
                        { required: false, message: '请输入权限备注', trigger: 'blur' },
                        { min: 2, max: 200, message: '权限备注长度为2 ~ 255个字', trigger: 'blur' }
                    ],
                    type: [
                        { required: true, message: '请选择权限类型', trigger: 'change' }
                    ],
                    status: [
                        { required: true, message: '请选择权限状态', trigger: 'change' }
                    ],
                }
            }
        },
        created() {
            this.nodesAll();
            console.log(this.type, this.storage)
        },
        methods: {
            nodesAll() {
                nodes.all().then((res) => {
                    this.nodeTree = res.data;
                    console.log(res);
                }).then((err) => {})
            },
            formatData(){
                let data = this.formData;
                data.path.join(',');
                return data;
            },
            onSubmit(name) {
                console.log(this.type, this.storage)
                this.$refs[name].validate((valid) => {
                    if (valid) {
                        nodes.storage(this.formatData()).then((res) => {
                            tools.showMessage(res, () => {


                            })
                        })
                    }
                })
            },
            handleOpen() {
                console.log(this.type, this.storage)
                if (this.type == 2) {
                    this.fromData.name = this.storage.name;
                }
            }
        }
    }
</script>

<style scoped>
    .el-cascader{
        display:block !important;
    }
</style>