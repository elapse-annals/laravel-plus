<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
        <div>
            <el-row :gutter="20">
                <el-col :span="6">
                    <div class="grid-content bg-purple">66</div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">555</div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">444</div>
                </el-col>
                <el-col :span="6">
                    <div class="grid-content bg-purple">333</div>
                </el-col>
            </el-row>


        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
