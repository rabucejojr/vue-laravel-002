
<script setup>
import { ref, computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import Swal from 'sweetalert2';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    students:{
        type:[Object,Array],
        default:()=>[],
    }
});
const form = useForm({});
const add = ()=>{
    // console.log('add student');
    form.get(route('students.create'));
};
const edit = (id)=>{
    form.get(route('students.edit',id));
};
const delete_id = (id)=>{
    Swal.fire({
        title: 'Are you sure you?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result)=>{
        if (result.isConfirmed) {
        form.delete(`students/${id}`,{
            onSuccess:()=>{
                console.log('deleted successfully');
            },
            onError: (errors) => {
                console.log('failed to delete');
            }
            });
            }
        else {
            console.log('delete cancelled');
        }
    })
};
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Students"/>
        <div>
            <div class="flex justify-center">
                <!-- <div class=" flex justify-start p-5">
                </div> -->
                <div class="w-3/5 flex justify-start p-5">

                    <input type="text" class="mr-3 border rounded">
                    <PrimaryButton class="bg-sky-500 rounded-lg mr-3">Search</PrimaryButton>
                    <PrimaryButton @click="add" class="bg-sky-500 rounded-lg">Add Student</PrimaryButton>
                </div>
            </div>
            <!-- {{ students.data }} -->
            <div class="">
                <div class="flex justify-center">
                    <table class="w-3/5 text-center border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">First Name</th>
                                <th class="border border-gray-300 px-4 py-2">Middle Name</th>
                                <th class="border border-gray-300 px-4 py-2">Last Name</th>
                                <th class="border border-gray-300 px-4 py-2">Extension</th>
                                <th class="border border-gray-300 px-4 py-2">Purok</th>
                                <th class="border border-gray-300 px-4 py-2">Brgy.</th>
                                <th class="border border-gray-300 px-4 py-2">City/Municipality</th>
                                <th class="border border-gray-300 px-4 py-2">Province</th>
                                <th class="border border-gray-300 px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="student in students.data" :key="student.id">
                                <td class="border border-gray-300 px-4 py-2">{{ student.id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.firstname }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.middlename }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.lastname }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.extension }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.purok }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.brgy }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.municipality }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.province }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <div class="pb-2">
                                        <PrimaryButton class="bg-sky-500 rounded-lg px-4 py-2 w-full text" @click="edit(student.id)">Edit</PrimaryButton>
                                    </div>
                                    <div class="">
                                        <DangerButton class="px-4 py-2 w-full text-center" @click="delete_id(student.id)">Delete</DangerButton>
                                    </div>
                                </td >
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Component -->
                <div class="flex justify-center mb-4">
                    <Pagination class="mt-4" :links="students.links"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
