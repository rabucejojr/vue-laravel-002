<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { FilterMatchMode, FilterOperator } from 'primevue/api';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

// Define reactive state variables
const students = ref([]);
const filters = ref();
const loading = ref(true);

// Fetch student data from the server
const fetchStudents = async () => {
    try {
        const response = await axios.get('/search');  // Adjust the endpoint based on your Laravel route
        students.value = response.data.data;
        loading.value = false;
    } catch (error) {
        console.error("Error fetching student data:", error);
    }
};

// Initialize filter configurations
const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        firstname: { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }] },
        lastname: { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }] },
        brgy: { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }] },
        municipality: { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }] },
        province: { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }] },
    };
};

onMounted(() => {
    initFilters();
    fetchStudents();
});

// Reset filters
const clearFilter = () => {
    initFilters();
};
</script>

<template>
    <div class="card">
        <!-- DataTable Component -->
        <DataTable v-model:filters="filters" :value="students" paginator showGridlines :rows="10" dataKey="id"
                   filterDisplay="menu" :loading="loading" :globalFilterFields="['firstname', 'lastname', 'brgy', 'municipality', 'province']">
            <!-- Table Header with Clear Filter Button and Global Search -->
            <template #header>
                <div class="flex justify-content-between">
                    <Button type="button" icon="pi pi-filter-slash" label="Clear" outlined @click="clearFilter()" />
                    <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
                </div>
            </template>

            <template #empty> No students found. </template>
            <template #loading> Loading student data. Please wait. </template>

            <!-- Student Data Columns with Field-based Filters -->
            <Column field="firstname" header="First Name" style="min-width: 12rem">
                <template #body="{ data }">{{ data.firstname }}</template>
                <template #filter="{ filterModel }">
                    <InputText v-model="filterModel.value" type="text" class="p-column-filter" placeholder="Search by first name" />
                </template>
            </Column>
            <Column field="middlename" header="Middle Name" style="min-width: 12rem">
                <template #body="{ data }">{{ data.middlename }}</template>
            </Column>
            <Column field="lastname" header="Last Name" style="min-width: 12rem">
                <template #body="{ data }">{{ data.lastname }}</template>
                <template #filter="{ filterModel }">
                    <InputText v-model="filterModel.value" type="text" class="p-column-filter" placeholder="Search by last name" />
                </template>
            </Column>
            <Column field="extension" header="Extension" style="min-width: 8rem">
                <template #body="{ data }">{{ data.extension }}</template>
            </Column>
            <Column field="purok" header="Purok" style="min-width: 8rem">
                <template #body="{ data }">{{ data.purok }}</template>
            </Column>
            <Column field="brgy" header="Barangay" style="min-width: 12rem">
                <template #body="{ data }">{{ data.brgy }}</template>
                <template #filter="{ filterModel }">
                    <InputText v-model="filterModel.value" type="text" class="p-column-filter" placeholder="Search by barangay" />
                </template>
            </Column>
            <Column field="municipality" header="Municipality" style="min-width: 12rem">
                <template #body="{ data }">{{ data.municipality }}</template>
                <template #filter="{ filterModel }">
                    <InputText v-model="filterModel.value" type="text" class="p-column-filter" placeholder="Search by municipality" />
                </template>
            </Column>
            <Column field="province" header="Province" style="min-width: 12rem">
                <template #body="{ data }">{{ data.province }}</template>
                <template #filter="{ filterModel }">
                    <InputText v-model="filterModel.value" type="text" class="p-column-filter" placeholder="Search by province" />
                </template>
            </Column>
        </DataTable>
    </div>
</template>
