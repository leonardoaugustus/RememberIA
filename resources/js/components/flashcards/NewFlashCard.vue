<script setup lang="ts">
import { computed, watch } from 'vue'
import { useForm, router } from '@inertiajs/vue3'
import {
    Select, SelectContent, SelectItem, SelectTrigger, SelectValue
} from '@/components/ui/select'
import { Button } from '@/components/ui/button'
import { Textarea } from '@/components/ui/textarea'
import { Label } from '@/components/ui/label'
import { Card, CardContent, CardFooter } from '@/components/ui/card'

/* 1. Formulário unificado ---------------------------------------------- */
const form = useForm({
    cardType: 'flashcard',
    question: '',
    answer: '',     // vai receber a resposta OU o texto inteiro
})

/* 2. Helper reativo ------------------------------------------------------ */
const isFlash = computed(() => form.cardType === 'flashcard')

/* 3. Limpa campos não utilizados ---------------------------------------- */
watch(() => form.cardType, (val) => {
    if (val === 'flashcard') {
        form.answer = ''        // limpa texto longo
    } else {
        form.question = ''      // limpa pergunta
    }
})

/* 4. Envio --------------------------------------------------------------- */
function handleSubmit() {
    form.post(route('flashcards.store'), {
        onSuccess: () => form.reset('question', 'answer'),
    })
}

/* 5. IA (exemplo) -------------------------------------------------------- */
async function generateAIAnswer() {
    if (!form.question.trim()) return
    // supondo que exista essa rota
    const { data } = await router.post(route('flashcards.ai'), { question: form.question })
    form.answer = data.answer
}
</script>

<template>
    <Card class="w-full mx-auto p-6 rounded-xl">
        <form @submit.prevent="handleSubmit">
            <CardContent class="space-y-6">
                <!-- tipo --------------------------------------------------->
                <div>
                    <Label for="cardType" class="mb-2">Tipo</Label>
                    <Select id="cardType" v-model="form.cardType" required>
                        <SelectTrigger class="w-full">
                            <SelectValue placeholder="Selecione o tipo" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="flashcard">FlashCards</SelectItem>
                            <SelectItem value="text">Corrigir Textos</SelectItem>
                        </SelectContent>
                    </Select>
                </div>

                <!-- FlashCards -------------------------------------------->
                <div v-if="form.cardType === 'flashcard'" class="space-y-4">
                    <div>
                        <Label for="question" class="mb-2">Pergunta</Label>
                        <Textarea id="question" v-model="form.question" class="w-full min-h-[100px]" required />
                    </div>

                    <div>
                        <Label for="answer" class="mb-2">Resposta</Label>
                        <Textarea id="answer" v-model="form.answer" class="w-full min-h-[100px]" required />
                    </div>
                </div>

                <!-- Corrigir Textos --------------------------------------->
                <div v-else class="space-y-4">
                    <Label for="answer" class="mb-2">Texto</Label>
                    <Textarea id="answer" v-model="form.answer" class="w-full min-h-[200px]" required />
                </div>
            </CardContent>


            <CardFooter class="flex justify-end mt-6">
                <Button type="button" variant="outline" v-if="isFlash" class="mr-2" :disabled="form.processing"
                    @click="generateAIAnswer">
                    Gerar Resposta com IA
                </Button>

                <Button type="submit" :disabled="form.processing">
                    {{ form.processing ? 'Salvando…' : 'Salvar' }}
                </Button>
            </CardFooter>
        </form>
    </Card>
</template>
