<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Latest libraries
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div
                        class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert" v-if="$page.props.flash.message">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ $page.props.flash.message }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <input
                            type="text"
                            placeholder="Search..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
                        />
                    </div>
                    <!-- table -->
                    <table class="table-fixed w-full posts-table">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Language</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Latest Release Published</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in libraries">
                            <td class="px-4 py-2 border">{{ item.name }}</td>
                            <td class="px-4 py-2 border">{{ item.language }}</td>
                            <td class="px-4 py-2 border">{{ item.description }}</td>
                            <td class="px-4 py-2 border">{{ item.latest_release_published_at }}</td>
                            <td class="border px-4 py-2">
                                <button
                                    @click="openForm(item)"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add
                                    to bookmarks
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

export default {
    props: ['libraries'],
    components: {
        AuthenticatedLayout,
        Head,
    }
}
</script>

