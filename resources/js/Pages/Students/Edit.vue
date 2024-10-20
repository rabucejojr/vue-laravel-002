<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { watchEffect } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
const props = defineProps({
    student:Object,
})
const form = useForm({
    firstname:props.student.firstname,
    middlename:props.student.middlename,
    lastname:props.student.lastname,
    extension:props.student.extension,
    purok:props.student.purok,
    brgy:props.student.brgy,
    municipality:props.student.municipality,
    province:props.student.province,
});

const back = () =>{
    console.log('back');
}
const update = ()=>{
    // form.put(route('students.update',props.student.id))
    Swal.fire({
        title: 'Save update?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Update',
        cancelButtonText: 'Cancel'
    }).then((result)=>{
        if (result.isConfirmed) {
            form.put(route('students.update',props.student.id))
            }
        else {
            console.log('delete cancel');
        }
    })
};
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Edit Students"/>
            <form @submit.prevent="update">
                <div class="pt-8">
                    <!-- <div class="space-y-4 max-w-md mx-auto p-4 bg-white shadow-md rounded-lg"> -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto p-4">
                        <div class="flex flex-col">
                            <label for="firstname" class="text-gray-700 mb-2 font-semibold">First Name</label>
                            <input type="text" id="firstname" v-model="form.firstname" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="middlename" class="text-gray-700 mb-2 font-semibold">Middle Name</label>
                            <input type="text" id="middlename" v-model="form.middlename" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="lastname" class="text-gray-700 mb-2 font-semibold">Last Name</label>
                            <input type="text" id="lastname" v-model="form.lastname" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="extension" class="text-gray-700 mb-2 font-semibold">Extension (Jr.,Sr, II, III)</label>
                            <input type="text" id="extension" v-model="form.extension" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="purok" class="text-gray-700 mb-2 font-semibold">Purok</label>
                            <input type="text" id="purok" v-model="form.purok" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="brgy" class="text-gray-700 mb-2 font-semibold">Barangay</label>
                            <input type="text" id="brgy" v-model="form.brgy" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="municipality" class="text-gray-700 mb-2 font-semibold">Municipality</label>
                            <input type="text" id="municipality" v-model="form.municipality" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="province" class="text-gray-700 mb-2 font-semibold">Province</label>
                            <input type="text" id="province" v-model="form.province" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </form>
            <div class="sm:col-span-2 flex justify-center space-x-4">
                    <button type="button" @click="back" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Back
                    </button>
                    <button type="submit" @click="update" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Submit
                    </button>
                </div>
    </AuthenticatedLayout>
</template>
