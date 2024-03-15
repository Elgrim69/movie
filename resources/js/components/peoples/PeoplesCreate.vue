<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="savePeople">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Prénom</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.name">
                </div>
            </div>
            
            <div>
                <label for="surname" class="block text-sm font-medium text-gray-700">Nom</label>
                <div class="mt-1">
                    <input type="text" name="surname" id="surname"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.surname">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <textarea name="email" id="email"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.description"></textarea>
                </div>
            </div>
            
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <div class="mt-1">
                    <input type="text" name="image" id="website"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.image">
                </div>
            </div>
        </div>

        <button type="submit"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Valider
        </button>
    </form>
</template>

<script setup>
import { reactive } from "vue";
import usePeoples from "@/composables/peoples";

const form = reactive({
    name: '',
    surname: '',
    description: '',
    image: ''
})
    
const { errors, storePeople } = usePeoples()
const savePeople = async () => {
    console.log(form)
    await storePeople({ ...form });
}
</script>