<template>
    <el-aside width="230px" class="left-aside">
        <el-menu :background-color="menuBackgroundColor"
                 :text-color="menuTextColor"
                 :active-text-color="activeMenuTextColor"
                 class="el-menu-vertical-demo"
                 @open="handleOpen"
                 @close="handleClose">

            <el-submenu index="1">
                <template slot="title">
                    <i class="el-icon-location"></i>
                    <span>导航一</span>
                </template>

                <el-menu-item index="1-1"><i class="el-icon-location"></i>选项1</el-menu-item>
                <el-menu-item index="1-2"><i class="el-icon-location"></i>选项2</el-menu-item>

                <el-submenu index="1-4">
                    <template slot="title"><i class="el-icon-location"></i>选项4</template>
                    <el-menu-item index="1-4-1"><i class="el-icon-location"></i>选项1</el-menu-item>
                </el-submenu>
            </el-submenu>
        </el-menu>
    </el-aside>
</template>

<script>
    export default {
        name: "leftAside",
        data: function () {
            return {
                menuBackgroundColor: '#545c64',
                menuTextColor: "#ffffff",
                activeMenuTextColor: "#ffd04b",
            }
        },
        methods: {
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>

<style scoped>
    .el-menu-vertical-demo {
        height: 100%;
        margin-left: -5px !important;
    }

</style>