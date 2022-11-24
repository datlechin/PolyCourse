<script setup>
import { Link, Head } from '@inertiajs/inertia-vue3'
</script>

<template>
    <Head title="Lộ trình học" />
    <div>
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-3">Lộ trình học</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, eaque, nemo! Accusamus aliquid beatae commodi dolorum est ipsa itaque, maiores, nam numquam obcaecati odit optio quis recusandae, rerum ut voluptatum.</p>
        </div>
        <div class="grid grid-cols-2 mt-5 space-x-5">
            <div class="grid grid-cols-3 border rounded-xl px-7 py-5">
                <div class="col-span-2">
                    <h4 class="text-xl font-bold">Lộ trình học Front-end</h4>
                    <p class="py-5 text-sm leading-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem eos illo incidunt magnam obcaecati odit perferendis perspiciatis quasi! Hic laboriosam quia quibusdam rem voluptas. Adipisci animi architecto eaque provident reprehenderit.</p>
                    <Link class="bg-blue-500 text-white rounded-full py-2.5 px-4 hover:bg-blue-700">Xem chi tiết</Link>
                </div>
                <div class="col-span-1 ml-3">
                    <img class="w-28 h-28 object-cover rounded-full border-4 border-blue-500" src="https://files.fullstack.edu.vn/f8-prod/learning-paths/2/61a0439062b82.png" alt="">
                </div>
            </div>
            <div class="grid grid-cols-3 border rounded-xl px-7 py-5">
                <div class="col-span-2">
                    <h4 class="text-xl font-bold">Lộ trình học Front-end</h4>
                    <p class="py-5 text-sm leading-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem eos illo incidunt magnam obcaecati odit perferendis perspiciatis quasi! Hic laboriosam quia quibusdam rem voluptas. Adipisci animi architecto eaque provident reprehenderit.</p>
                    <Link class="bg-blue-500 text-white rounded-full py-2.5 px-4 hover:bg-blue-700">Xem chi tiết</Link>
                </div>
                <div class="col-span-1 ml-3">
                    <img class="w-28 h-28 object-cover rounded-full border-4 border-blue-500" src="https://files.fullstack.edu.vn/f8-prod/learning-paths/2/61a0439062b82.png" alt="">
                </div>
            </div>
        </div>
    </div>
</template>
