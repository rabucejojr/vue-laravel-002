<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Chart from './Graph/Chart.vue';
import { RiSearch2Line } from '@remixicon/vue';


// Extract props from Inertia page props
const { student, search } = usePage().props;

// Use a ref to bind the input search query
const searchQuery = ref(search);

// Rename the search method to avoid the conflict
const performSearch = () => {
    // Inertia.get(route('search'), { search: searchQuery.value }, { preserveState: true });
    console.log('click');
};
</script>

<template>
    <div>
        <div class="flex flex-row">
            <div class="flex items-center">
                <RiSearch2Line/>
            </div>
            <div class="">
                <input class="rounded-lg" v-model="searchQuery" placeholder="Search ..." @input="performSearch" />
            </div>
        </div>
    </div>
</template>
