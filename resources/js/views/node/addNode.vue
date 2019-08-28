<template>
    <div>
        <el-dialog :title="title" :visible.sync="showModel" >
            <el-form ref="formData" :model="formData" label-width="80px">
                <el-form-item label="权限名称">
                    <el-input v-model="formData.name"></el-input>
                </el-form-item>
                <el-form-item label="权限路由">
                    <el-input v-model="formData.router"></el-input>
                </el-form-item>
                <el-form-item label="权限图标">
                    <el-input v-model="formData.icons"></el-input>
                </el-form-item>
                <el-form-item label="权限排序">
                    <el-input v-model="formData.sort"></el-input>
                </el-form-item>
                <el-form-item label="权限类型">
                    <el-radio-group v-model="formData.type">
                        <el-radio label="菜单"></el-radio>
                        <el-radio label="资源"></el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item label="权限状态">
                    <el-radio-group v-model="formData.status">
                        <el-radio label="显示"></el-radio>
                        <el-radio label="隐藏"></el-radio>
                    </el-radio-group>
                </el-form-item>

            </el-form>

        </el-dialog>
    </div>
</template>

<script>
    export default {
        props: {
            showModel:Boolean,
            fn:Function,
            type:Number,
            editFormData:Object
        },
        name: "addNode",
        data() {
            return {
                title: '添加|编辑权限',
                innerVisible: true,
                formData: {
                    name:'',
                    router: '',
                    icons:'',
                    mark:'',
                    sort:'',
                    type:'',
                    status:'',
                    parent_id:''
                }
            }
        }
    }
</script>

<style scoped>

</style>