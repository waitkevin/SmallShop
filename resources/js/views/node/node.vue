<template>
    <div>
        <el-row class="padding10" :gutter="5">
            <el-col :span="24">
                <el-button size="small" type="primary" icon="el-icon-edit">添加权限</el-button>
                <el-button size="small" type="danger" icon="el-icon-delete">删除权限</el-button>
            </el-col>
        </el-row>

        <el-row :gutter="10" class="padding10 paddingTop20 border-body">
            <el-col :span="3" class="padding-bottom-10">
                <el-input size="small" placeholder="请输入权限名称查询"></el-input>
            </el-col>
            <el-col :span="3" class="padding-bottom-10">
                <el-input size="small" placeholder="请输入权限路由查询"></el-input>
            </el-col>
            <el-col :span="2" class="padding-bottom-10">
                <el-select size="small" v-model="value" placeholder="选择权限类型">
                    <el-option
                        v-for="item in nodeType"
                        :key="item.value"
                        :label="item.title"
                        :value="item.value">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="3" class="padding-bottom-10">
                <el-button size="small" type="primary" icon="el-icon-search">搜索</el-button>
            </el-col>
        </el-row>

        <el-row :gutter="5">
            <el-col class="menu-table" :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
                <el-table style="width: 100%">
                    <el-table-column type="selection" width="55"></el-table-column>
                    <el-table-column label="菜单名称"></el-table-column>
                    <el-table-column label="菜单描述"></el-table-column>
                    <el-table-column label="菜单路由"></el-table-column>
                    <el-table-column label="菜单图标"></el-table-column>
                    <el-table-column label="PARENTID"></el-table-column>
                    <el-table-column label="菜单状态"></el-table-column>
                    <el-table-column label="创建者"></el-table-column>
                    <el-table-column label="创建时间"></el-table-column>
                    <el-table-column label="管理"></el-table-column>
                </el-table>
            </el-col>
        </el-row>

    </div>
</template>

<script>
    export default {
        name: "node",
        data: function () {
            return {
                nodeType: [
                    {title: '菜单节点', value: 1},
                    {title: '操作节点', value: 2}
                ],
                value: '',
            }
        }
    }
</script>

<style scoped>

</style>