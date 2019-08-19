<template>
    <div>
        <el-row class="main-breadcrumb">
            <el-col :xs="6" :sm="6" :md="24" :lg="12" :xl="12"><b>{{ $store.state.crumbs[0]? $store.state.crumbs[0] : '首页'}}</b></el-col>
            <el-col :xs="18" :sm="18" :md="24" :lg="12" :xl="12" hidden-md-only>
                <el-breadcrumb class="crumbs">
                    <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                    <el-breadcrumb-item v-for="(item, index) in $store.state.crumbs" :key="index">{{item}}</el-breadcrumb-item>
                </el-breadcrumb>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        name: "mainBreadcrumb"
    }
</script>

<style scoped>
    .main-breadcrumb {
        padding: 10px;
        font-size: 16px;
        background: #FFFFFF;
        font-family: "Microsoft YaHei";
        border-radius: 3px;
    }
    .crumbs {
        float: right;
        font-size: 14px;
        font-family: "Microsoft YaHei";
        padding: 4px 0px 0px 0px;
    }

    .tree-font .el-tree-node__label {
        font-size: 16px;
    }

    .tree-font .el-checkbox__inner {
        width: 16px;
        height: 16px;
    }

    .tree-font .el-tree-node__expand-icon {
        font-size: 16px;
    }
</style>