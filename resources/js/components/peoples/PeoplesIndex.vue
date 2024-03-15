<template>
je suis la home
</template>

<script setup>
import usePeoples from '@/composables/peoples'
import { onMounted } from 'vue';

const { peoples, getPeoples } = usePeoples()

onMounted(getPeoples)
</script>