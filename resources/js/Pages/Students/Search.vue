<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Chart from './Graph/Chart.vue';

// Extract props from Inertia page props
const { student, search } = usePage().props;

// Use a ref to bind the input search query
const searchQuery = ref(search);

// Rename the search method to avoid the conflict
const performSearch = () => {
    Inertia.get(route('search'), { search: searchQuery.value }, { preserveState: true });
};
</script>

<template>
    <div>
        <h1>Search Results for: {{ search }}</h1>

        <input v-model="searchQuery" placeholder="Search by barangay, municipality, or province" @input="performSearch" />

        <div v-if="student.length">
        <Chart :students="students" />
        </div>
        <div v-else>
        <p>No results found.</p>
        </div>
    </div>
</template>
