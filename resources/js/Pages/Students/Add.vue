<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';

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
        },
    })
}
</script>

<template>
    <AuthenticatedLayout>
        <form @submit.prevent="submit">
            <div class="">
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

                <button type="submit" class="p-2">Submit</button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
