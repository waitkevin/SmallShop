<template>
    <el-aside width="230px" class="left-aside">
        <el-menu :background-color="menuBackgroundColor"
                 :text-color="menuTextColor"
                 :active-text-color="activeMenuTextColor"
                 :unique-opened="uniqueOpened"
                 :default-active="active"
                 class="el-menu-vertical-demo"
                 @select="handleSelect">

            <el-submenu v-for="(item, index) in menus" :index="index.toString()">
                <template slot="title">
                    <i :class="item.icons"></i>
                    <span>{{ item.name }}</span>
                </template>

                <el-menu-item v-for="(itemChild, indexChild) in item.children" :index="index + '-' + indexChild">
                    <i :class="itemChild.icons"></i>
                    <span>{{ itemChild.name }}</span>
                </el-menu-item>
            </el-submenu>
        </el-menu>
    </el-aside>
</template>

<script>
    import users from '../../api/users';
    export default {
        name: "leftAside",
        data: function () {
            return {
                menuBackgroundColor: '#545c64',
                menuTextColor: "#ffffff",
                activeMenuTextColor: "#ffd04b",
                uniqueOpened: true,
                menus: [],
                crumb: [],
                active: '',
            }
        },
        created(){
            this.$nextTick(() => {
                if(window.sessionStorage.getItem('active_menu')){
                    this.active = sessionStorage.getItem('active_menu');
                }
            })
        },
        methods: {
            menuTree() {
                users.menuTree().then((res) => {
                    this.menus = res.code === 1? res.data : [];
                }).catch((err) => {})
            },
            handleSelect(key) {
                this.crumb = [];
                let [x, y] = key.split('-');
                this.crumb.push(this.menus[x].name, this.menus[x].children[y].name);
                this.$store.commit('setCrumbs', {crumbs: this.crumb});

                this.active = key;
                sessionStorage.setItem('active_menu', key);
                sessionStorage.setItem('user_menu', this.crumb);

                this.$router.push({name: this.menus[x].children[y].router});
            }
        },
        mounted:function(){
            this.menuTree();
            this.$store.commit('setCrumbs', {
                crumbs: sessionStorage.getItem('user_menu').split(',')
            })
        },
    }
</script>

<style scoped>
    .el-menu-vertical-demo {
        height: 100%;
        margin-left: -5px !important;
    }
</style>