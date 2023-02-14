<template>
<div>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <button
                        @click="openForm()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New
                        Categories
                    </button>

                    <!-- table -->
                    <table class="table-fixed w-full posts-table">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in data">
                            <td class="px-4 py-2 border">{{ item.id }}</td>
                            <td class="px-4 py-2 border">{{ item.name }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <category-form :isOpen="isFormOpen" :isEdit="isFormEdit" :form="formObject"
                                   @formsave="saveItem" @formclose="closeModal"></category-form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</div>
</template>

<script>

const defaultFormObject = {
    name: null
};

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CategoryForm from '@/Components/Category/form.vue';

export default {
    props: ['data'],
    components: {
        AuthenticatedLayout,
        Head,
        CategoryForm
    },
    data()
    {
        return {
            isFormOpen: false,
            isFormEdit: false,
            formObject: defaultFormObject,
        }
    },
    methods: {
        saveItem(item)
        {
            let url = '/categories'
            this.$inertia.post(url, item, {
                onError: () => {

                },
                onSuccess: () => {
                    this.closeModal();
                }
            });
        },
        closeModal()
        {
            this.isFormOpen = false;
        },
        openForm(item)
        {
            this.isFormOpen = true;
            this.isFormEdit = !!item;
            this.formObject = item ? item : defaultFormObject;
        }
    }
}
</script>
