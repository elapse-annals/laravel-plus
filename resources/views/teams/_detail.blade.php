<template>
    <el-form-item>
    <el-row>
        <el-col :span="4">
            <label for="id">id</label>
        </el-col>
        <el-col :span="16">
            <el-input id="id"
                      :class="{aggravation:detail_data.id}"
                      v-model="detail_data.id"
                      :disabled="is_disabled_edit"
                      placeholder="id"></el-input>
        </el-col>
    </el-row>
</el-form-item><el-form-item>
    <el-row>
        <el-col :span="4">
            <label for="user_id">user_id</label>
        </el-col>
        <el-col :span="16">
            <el-input id="user_id"
                      :class="{aggravation:detail_data.user_id}"
                      v-model="detail_data.user_id"
                      :disabled="is_disabled_edit"
                      placeholder="user_id"></el-input>
        </el-col>
    </el-row>
</el-form-item><el-form-item>
    <el-row>
        <el-col :span="4">
            <label for="name">name</label>
        </el-col>
        <el-col :span="16">
            <el-input id="name"
                      :class="{aggravation:detail_data.name}"
                      v-model="detail_data.name"
                      :disabled="is_disabled_edit"
                      placeholder="name"></el-input>
        </el-col>
    </el-row>
</el-form-item><el-form-item>
    <el-row>
        <el-col :span="4">
            <label for="personal_team">personal_team</label>
        </el-col>
        <el-col :span="16">
            <el-input id="personal_team"
                      :class="{aggravation:detail_data.personal_team}"
                      v-model="detail_data.personal_team"
                      :disabled="is_disabled_edit"
                      placeholder="personal_team"></el-input>
        </el-col>
    </el-row>
</el-form-item><el-form-item>
    <el-row>
        <el-col :span="4">
            <label for="created_at">created_at</label>
        </el-col>
        <el-col :span="16">
            <el-input id="created_at"
                      :class="{aggravation:detail_data.created_at}"
                      v-model="detail_data.created_at"
                      :disabled="is_disabled_edit"
                      placeholder="created_at"></el-input>
        </el-col>
    </el-row>
</el-form-item><el-form-item>
    <el-row>
        <el-col :span="4">
            <label for="updated_at">updated_at</label>
        </el-col>
        <el-col :span="16">
            <el-input id="updated_at"
                      :class="{aggravation:detail_data.updated_at}"
                      v-model="detail_data.updated_at"
                      :disabled="is_disabled_edit"
                      placeholder="updated_at"></el-input>
        </el-col>
    </el-row>
</el-form-item>
</template>
