<script setup lang="ts">
import { ref } from 'vue';
import { Card, CardHeader, CardTitle, CardContent, CardFooter } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/components/ui/accordion'

</script>


<template>

    <h1 class="text-xl font-medium tracking-tight">25 de Junho de 2025</h1>
    <Card class="w-full mx-auto p-6 rounded-xl">
        <CardHeader>
            <div>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-medium">Pergunta:</h4>
                        <p class="text-sm text-muted-foreground">
                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. -->
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                    </div>

                    <div>
                        <h4 class="font-medium">Resposta:</h4>
                        <p class="text-sm text-muted-foreground">
                            <!-- Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. -->
                            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>


            <p class="text-sm italic text-muted-foreground">
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
        </CardHeader>

        <CardContent>
            <Accordion type="single" collapsible>
                <AccordionItem value="item-1">
                    <AccordionTrigger>Visualizar Mais</AccordionTrigger>
                    <AccordionContent>
 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                    </AccordionContent>
                </AccordionItem>
            </Accordion>

            <!-- <Collapsible class="mt-4">


                <CollapsibleContent>
                    <div class="pt-4 space-y-4">
                        <div v-if="memory.type === 'flashcard'">
                            <p>Explicação adicional sobre este flashcard...</p>
                            <p>Informações adicionais sobre como usar este conhecimento...</p>
                        </div>

                        <div v-else-if="memory.type === 'text-correction'" class="space-y-2">
                            <div>
                                <h4 class="font-medium">Texto Corrigido:</h4>
                                <p class="text-sm">{{ memory.correctedText }}</p>
                            </div>

                            <div>
                                <h4 class="font-medium">Correções:</h4>
                                <ul class="list-disc pl-5 text-sm">
                                    <li v-for="(correction, index) in memory.corrections" :key="index">
                                        {{ correction.detail }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </CollapsibleContent>
            </Collapsible> -->
        </CardContent>

        <!-- <CardFooter v-if="isExpanded" class="flex justify-between">
            <Select>
                <SelectTrigger class="w-[180px]">
                    <SelectValue placeholder="Categoria" />
                </SelectTrigger>
                <SelectContent>
                    <SelectItem value="ingles">Inglês</SelectItem>
                    <SelectItem value="programacao">Programação</SelectItem>
                    <SelectItem value="matematica">Matemática</SelectItem>
                </SelectContent>
            </Select>

            <Button>Adicionar mais vezes no aprendizado</Button>
        </CardFooter> -->
    </Card>
</template>