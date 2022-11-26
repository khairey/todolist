<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title"> TODO List</h2>
            <add-item-form />
        </div>
        <list-view />
    </div>
</template>

<script>
import addItemForm from './addItemForm.vue';
import listView from './listView.vue';
import listItem from './listItem.vue';
export default {
    components: {
        addItemForm,
        listView,
        listItem
    }
}
</script>

<style scoped>
.todoListContainer{
    width: 350px;
    margin: auto;
}
.heading{
    background: #e6e6e6;
    padding: 10px;
}
#title{
    text-align: center;
}
</style>