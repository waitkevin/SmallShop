<template>
    <el-container class="top-container">
        <TopHeader></TopHeader>
        <el-container>
            <LeftAside class="left-container"></LeftAside>
            <el-container class="main-container">
                <MainBreadcrumb></MainBreadcrumb>

                <div class="content-container scrollbar">
                    <router-view></router-view>
                </div>

                <BottomFooter></BottomFooter>
            </el-container>
        </el-container>
    </el-container>
</template>

<script>
    import TopHeader from '../common/topHeader';
    import LeftAside from '../common/leftAside';
    import BottomFooter from '../common/BottomFooter';
    import MainBreadcrumb from '../common/mainBreadcrumb';

    export default {
        name: "layout",
        components: {
            TopHeader,
            LeftAside,
            BottomFooter,
            MainBreadcrumb
        }
    }
</script>

<style scoped>
    .content-container {
        margin-top: 15px;
        min-height: calc(100vh - 150px);
        background-color: #ffffff;
        border-radius: 4px;
    }
</style>