<script setup>
const emit = defineEmits(['searchInput']);

const searchInput = (e) =>{
    // console.log(e.target.value);
    emit('searchInput',e.target.value);
}

</script>
<template>
    <form >
        <input type="text" @input="searchInput" placeholder="Search" class="mr-3 border rounded">
    </form>
</template>
