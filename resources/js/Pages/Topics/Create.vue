<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
const form = useForm({
    name: null,
    image: null,
});

function storeTopic() {
    form.post("/topics");
}
</script>

<template>
    <Head title="Topics" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Topics
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        href="/topics"
                        class="px-4 py-2 bg-indigo-500 text-white rounded"
                        >Back</Link
                    >
                </div>
                <div class="grid place-content-center mt-10">
                    <form
                        @submit.prevent="storeTopic"
                     
                        class="bg-white shadow-md m-2 p-2 rounded"
                    >
                        <div class="sm:col-span-6">
                            <label
                                for="title"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Name
                            </label>
                            <div class="mt-1">
                                <input
                                    v-model="form.name"
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label
                                for="title"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Image
                            </label>
                            <div class="mt-1">
                                <input
                                    type="file"
                                    @input="form.image = $event.target.files[0]"
                                    id="image"
                                    name="image"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                />
                            </div>
                        </div>
                        <div class="m-2 p-2">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-green-400 hover:bg-green-600 rounded-lg text-white"
                            >
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
