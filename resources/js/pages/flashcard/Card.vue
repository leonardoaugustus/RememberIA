<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

import NewFlashCard from '@/components/flashcards/NewFlashCard.vue';
import MemoryCard from '@/components/flashcards/MemoryCard.vue';

/* props vindas do back-end -------------------------------------------- */
const props = defineProps<{ cards: Array<any> }>()

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'FlashCards',
        href: '/flashcards',
    },
];
</script>

<template>

    <Head title="FlashCards" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">

            <NewFlashCard />

            <!-- lista recebe o array de cards -->
            <div v-if="props.cards.length">
                <MemoryCard v-for="card in props.cards" :key="card.id" :card="card" />
            </div>
        </div>
    </AppLayout>
</template>
