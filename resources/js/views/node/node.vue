<template>
    <div>
        <el-row class="padding10" :gutter="5">
            <el-col :span="24">
                <el-button size="small" type="primary" icon="el-icon-edit" @click="handleStorage(1)">添加权限</el-button>
            </el-col>
        </el-row>

        <el-row :gutter="10" class="padding10 paddingTop20 border-body">
            <el-col :span="3" class="padding-bottom-10">
                <el-input size="small" v-model="where.name" placeholder="请输入权限名称查询"></el-input>
            </el-col>
            <el-col :span="3" class="padding-bottom-10">
                <el-input size="small" v-model="where.router" placeholder="请输入权限路由查询"></el-input>
            </el-col>
            <el-col :span="2" class="padding-bottom-10">
                <el-select size="small" v-model="where.type" placeholder="选择权限类型">
                    <el-option label="菜单节点" value="1"></el-option>
                    <el-option label="操作节点" value="2"></el-option>
                </el-select>
            </el-col>
            <el-col :span="2" class="padding-bottom-10">
                <el-select size="small" v-model="where.status" placeholder="选择权限状态">
                    <el-option label="显示" value="1"></el-option>
                    <el-option label="隐藏" value="2"></el-option>
                </el-select>
            </el-col>
            <el-col :span="3" class="padding-bottom-10">
                <el-button size="small" type="primary" icon="el-icon-search">搜索</el-button>
            </el-col>
        </el-row>

        <el-row :gutter="5">
            <el-col class="menu-table" :span="24">
                <el-table style="width: 100%"
                          row-key="id"
                          :data="nodeData"
                          lazy
                          :load="handleChildren"
                          :tree-props="{children: 'children', hasChildren: 'hasChildren'}">
                    <el-table-column label="ID" prop="id" ></el-table-column>
                    <el-table-column label="权限节点名称" prop="name"></el-table-column>
                    <el-table-column label="权限节点路由" prop="router"></el-table-column>
                    <el-table-column label="权限节点图标" prop="icons"></el-table-column>
                    <el-table-column label="权限节点备注" prop="mark"></el-table-column>
                    <el-table-column label="权限节点类型" prop="type">
                        <template slot-scope="scope">
                            <span>{{ scope.row.type == 1? '菜单节点': '操作节点'}}</span>
                        </template>
                    </el-table-column>
                    <el-table-column label="节点状态" prop="status">
                        <template slot-scope="scope">
                            <span>{{ scope.row.status == 1? '显示': '隐藏'}}</span>
                        </template>
                    </el-table-column>
                    <el-table-column label="创建时间" prop="created_at"></el-table-column>
                    <el-table-column label="操作" min-width="60">
                        <template slot-scope="scope">
                            <el-button @click="handleStorage(2, scope.row)" size="small" type="success" icon="el-icon-edit">编辑</el-button>
                            <el-button @click="handleDestroy(scope.row.id)" size="small" type="danger" icon="el-icon-delete">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-col>
        </el-row>
        <ModelBox :showModel="showModel" :type="type" :storage="storage"></ModelBox>

    </div>
</template>

<script>
    import ModelBox from './addNode';
    import nodes from '../../api/nodes';
    import tools from '../../common/tools';
    export default {
        name: "node",
        components:{
            ModelBox,
        },
        data: function () {
            return {
                nodeData: [],
                showModel: false,
                storage: {},
                type: 0,
                where: {
                    name: '',
                    router: '',
                    type: '',
                    status: '',
                },
            }
        },
        created(){
            this.handleNodes();
        },
        methods: {
            handleDestroy(nodeId) {
                nodes.destroy({id: nodeId}).then((res) => {
                    tools.showMessage(res, () =>{
                        this.handleNodes();
                    });
                }).then((err) => {});
            },
            handleChildren(tree, treeNode, resolve) {
                nodes.show({parent_id: tree.id}).then((res) => {
                    if (res.code === 1) {
                        resolve(res.data.list);
                    }
                });
            },
            handleNodes() {
                nodes.show(this.where).then((res) => {
                    if (res.code === 1) {
                        this.nodeData = res.data.list;
                    }
                })
            },
            handleStorage(type, params = {}) {
                this.showModel = true;
                this.type = type;
                this.storage = params;
            }
        }
    }
</script>

<style scoped>

</style>