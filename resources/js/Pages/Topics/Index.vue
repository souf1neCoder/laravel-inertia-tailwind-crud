<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
	topics:Array
})

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
                    <Link href="/topics/create" class="px-4 py-2 bg-indigo-500 text-white rounded">Add</Link>

                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block w-full shadow rounded-lg overflow-hidden">

                <table class="w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Name
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Image
								</th>
								<th>

								</th>
								
								
							</tr>
						</thead>
						<tbody>
							<tr v-for="topic in topics" :key="topic.id">
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									{{topic.name}}
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<img class="w-12 h-12 rounded-full"
                                                :src="topic.image"
                                                alt="" />
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<Link :href="`/topics/${topic.id}/edit`" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white  text-sm">
									<Link method="delete" as="button" type="button" :href="`/topics/${topic.id}`" class="text-red-600 hover:text-red-900">Delete</Link>
								</td>
							
								
								
							</tr>
						
							
							
						</tbody>
					</table>
                      </div>
        </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
