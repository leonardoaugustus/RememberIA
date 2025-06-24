<script setup lang="ts">
import type { Card as CardType } from '@/types'
defineProps<{ card: CardType }>()

import {
    Card, CardHeader, CardTitle, CardContent, CardFooter
} from '@/components/ui/card'
import {
    Accordion, AccordionContent, AccordionItem, AccordionTrigger
} from '@/components/ui/accordion'
</script>

<template>
    <Card class="w-full mx-auto p-6 rounded-xl my-3">
        <CardHeader>
            <CardTitle class="text-lg font-medium tracking-tight">
                {{ card.created_at }}
            </CardTitle>

            <div class="space-y-4 mt-4">
                <div v-if="card.type === 'FlashCards'">
                    <h4 class="font-medium">Pergunta</h4>
                    <p class="text-sm text-muted-foreground">{{ card.question }}</p>

                    <h4 class="font-medium mt-4">Resposta</h4>
                    <p class="text-sm text-muted-foreground">{{ card.answer }}</p>
                </div>

                <div v-else>
                    <h4 class="font-medium">Texto</h4>
                    <p class="text-sm text-muted-foreground whitespace-pre-wrap">
                        {{ card.answer }}
                    </p>
                </div>
            </div>
        </CardHeader>

        <CardContent>
            <Accordion type="single" collapsible>
                <AccordionItem value="extra">
                    <AccordionTrigger>Visualizar mais</AccordionTrigger>
                    <AccordionContent>
                        {{ card.explanation }}
                    </AccordionContent>
                </AccordionItem>
            </Accordion>
        </CardContent>
    </Card>
</template>
