<script setup lang="ts">
import { ref } from 'vue';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue
} from '@/components/ui/select';
import { Button } from '@/components/ui/button';
import { Textarea } from '@/components/ui/textarea';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardFooter } from '@/components/ui/card';

const cardType = ref('FlashCards');
const question = ref('');
const answer = ref('');
const text = ref('');

const handleSave = () => {
    // Logic to save the card based on the selected type
    console.log('Saving card:', { type: cardType.value, question, answer, text });
};
</script>

<template>
    <Card class="w-full mx-auto p-6 rounded-xl">
        <CardContent>
            <div class="space-y-6">
                <div>
                    <Label for="cardType" class="text-base font-medium block mb-2">Tipo</Label>
                    <Select v-model="cardType">
                        <SelectTrigger id="cardType" class="w-full">
                            <SelectValue placeholder="Selecione o tipo" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="FlashCards">FlashCards</SelectItem>
                            <SelectItem value="Corrigir Textos">Corrigir Textos</SelectItem>
                        </SelectContent>
                    </Select>
                </div>

                <!-- Conditional Fields Based on Card Type -->
                <div v-if="cardType === 'FlashCards'" class="space-y-4">
                    <div>
                        <Label for="question" class="text-base font-medium block mb-2">Digite sua pergunta</Label>
                        <Textarea id="question" v-model="question" class="w-full min-h-[100px]"
                            placeholder="Digite sua pergunta aqui..." />
                    </div>
                    <div>
                        <Label for="answer" class="text-base font-medium block mb-2">Resposta</Label>
                        <Textarea id="answer" v-model="answer" class="w-full min-h-[100px]"
                            placeholder="Digite a resposta aqui..." />
                    </div>
                </div>

                <div v-else class="space-y-4">
                    <div>
                        <Label for="text" class="text-base font-medium block mb-2">Digite seu texto</Label>
                        <Textarea id="text" v-model="text" class="w-full min-h-[200px]"
                            placeholder="Digite seu texto aqui..." />
                    </div>
                </div>
            </div>
        </CardContent>

        <CardFooter class="flex justify-end mt-6">
            <!-- Adicionar botão de gerar resposta com IA se o cardType for FlashCards -->
            <Button variant="outline" v-if="cardType === 'FlashCards'" class="mr-2"
                @click="() => { /* Logic to generate answer using AI */ }">
                Gerar Resposta com IA
            </Button>

            <Button @click="handleSave">Salvar</Button>
        </CardFooter>
    </Card>
</template>