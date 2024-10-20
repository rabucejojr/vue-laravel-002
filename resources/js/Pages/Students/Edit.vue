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
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <form @submit.prevent="update">
                    <label for="firstname" class="p-2" >First Name</label>
                    <input type="text" id="firstname" v-model="form.firstname">

                    <label for="middlename" class="p-2">Middle Name</label>
                    <input type="text" id="middlename" v-model="form.middlename">

                    <label for="lastname" class="p-2">Last Name</label>
                    <input type="text" id="lastname" v-model="form.lastname">

                    <label for="extension" class="p-2">Extension</label>
                    <input type="text" id="extension" v-model="form.extension">

                    <label for="purok" class="p-2">Purok</label>
                    <input type="text" id="purok" v-model="form.purok">

                    <label for="brgy" class="p-2">Brgy</label>
                    <input type="text" id="brgy" v-model="form.brgy">

                    <label for="municipality" class="p-2">Municipality</label>
                    <input type="text" id="municipality" v-model="form.municipality">

                    <label for="province" class="p-2">Province</label>
                    <input type="text" id="province" v-model="form.province">

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
