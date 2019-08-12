<template>
    <div>
        <el-row class="padding10" :gutter="5">
            <el-col :span="24">
                <el-button size="small" type="primary" icon="el-icon-edit">添加商品分类</el-button>
                <el-button size="small" type="danger" icon="el-icon-delete">删除商品分类</el-button>
            </el-col>
        </el-row>

        <el-row :gutter="5" class="padding10 paddingTop20 border-body">
            <el-col :span="3" class="padding-bottom-10">
                <el-input size="small" placeholder="请输入内容"></el-input>
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
        name: "category"
    }
</script>

<style scoped>

</style>