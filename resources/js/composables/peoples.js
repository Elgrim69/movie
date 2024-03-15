import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'


export default function usePeoples() {
    const people = ref([])
    const peoples = ref([])


    const errors = ref('')
    const router = useRouter()

    const getPeoples = async () => {
        let response = await axios.get('/api/peoples')
        peoples.value = response.data.data
    }

    const getPeople = async (id) => {
        let response = await axios.get(`/api/peoples/${id}`)
        people.value = response.data.data
    }

    const storePeople = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/peoples', data)
            await router.push({ name: 'peoples.admin.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updatePeople = async (id) => {
        errors.value = ''
        try {
            console.log(people)
            await axios.patch(`/api/peoples/${id}`, people.value)
            await router.push({ name: 'peoples.admin.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }
    
    const destroyPeople = async (id) => {
        await axios.delete(`/api/peoples/${id}`)
    }

    return {
        errors,
        people,
        peoples,
        getPeople,
        getPeoples,
        storePeople,
        destroyPeople,
        updatePeople
    }
}