<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { nextTick, onMounted, ref } from '@vue/runtime-core';

const log = ref('');
onMounted(() => {
    nextTick(() => {

        window.Echo.encryptedPrivate('user-test-' + usePage().props.auth.user.id)
            .listen('UserTest', (e) => {
                log.value = log.value + " \r\n " + JSON.stringify(e);
                console.log(e);
            });
    })

})

const form = useForm({
    body: '',
})
const sendevent = () => {
    form.post(route('sendevent'), {
        preserveScroll: true,
        onSuccess: () => form.reset()
    })
}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                </div>
            </div>
        </div>
        <div class="py-12">
            channel name : user-test-{{usePage().props.auth.user.id}} <br>
            channel full name : private-encrypted-user-test-{{usePage().props.auth.user.id}} <br>
            bind : App\\Events\\UserTest <br>
            Host =   socketdemo.ps4tek.com <br>
            port =   443 <br>
            PUSHER_APP_ID =   14755334 <br>
            encryption_master_key_base64 => OGpfgK40Pfh+yljM43shgRH6nBtYSctnly/BX5HEYgw= <br>
            <v-textarea label="body event" v-model="form.body"></v-textarea>
            <v-btn @click.prevent="sendevent" :loading="form.processing" :disabled="form.processing">send event with
                encrypted</v-btn>
        </div>
        <div>
            <v-btn icon="mdi-refresh" @click="log = ''"></v-btn>
            <v-textarea label="log channel and test receved" v-model="log"></v-textarea>
        </div>
    </AuthenticatedLayout>
</template>
