<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
const form = useForm({
    firstname:'',
    middlename:'',
    lastname:'',
    extension:'',
    purok:'',
    brgy:'',
    municipality:'',
    province:'',
});

const back = () =>{
    console.log('back');
};

const submit = () =>{
    const formData = new FormData();
    formData.append('firstname',form.firstname);
    formData.append('middlename',form.middlename);
    formData.append('lastname',form.lastname);
    formData.append('extension',form.extension);
    formData.append('purok',form.purok);
    formData.append('brgy',form.brgy);
    formData.append('municipality',form.municipality);
    formData.append('province',form.province);

    form.post(route('students.store'),{
        forceFormData:true,
        onSuccess: (response) => {
            console.log('Success:', response);
            form.reset();
            form.get(route('students.index'));
        },
        onError: (errors) => {
            console.log('Error:', errors);
            Swal.fire({
                title: 'Empty Fields',
                text: "Please check inputs",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Try Again',
                // cancelButtonText: 'Go Back'
            })
        },
    })
}
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Add Students"/>
        <div class="pt-8">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto p-4 bg-white shadow-md">
                        <!-- <div class="space-y-4 max-w-md mx-auto p-4 bg-white shadow-md rounded-lg"> -->
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
                        <div class="sm:col-span-2 flex justify-center">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
                <div class="mt-4 flex justify-center">
                    <button type="button" @click="back" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Back
                    </button>
                </div>

    </div>
    </AuthenticatedLayout>
</template>
