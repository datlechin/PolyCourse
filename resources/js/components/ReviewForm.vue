<script setup>
import { StarIcon, XMarkIcon } from '@heroicons/vue/24/solid'
import { useForm } from '@inertiajs/vue3'
import route from 'ziggy-js/src/js'
import InputError from '@/components/InputError.vue'

const props = defineProps({
    course: Object,
})

const form = useForm({
    rating: null,
    content: null,
})

const submit = () => {
    form.post(route('courses.reviews.store', { course: props.course.id }))
}
</script>

<template>
    <div class="fixed top-0 left-0 w-full h-full">
        <div class="bg-[rgba(28,29,31,.8)] w-full h-full">
            <div class="flex items-center justify-center min-h-full">
                <div class="bg-white rounded-lg px-7 pb-7 pt-5">
                    <div @click="isOpenRatingModal = false" class="flex justify-end mb-3 cursor-pointer">
                        <XMarkIcon class="w-5 h-5" />
                    </div>
                    <h2 class="font-bold text-lg">Bạn đánh giá khóa học này như thế nào?</h2>
                    <div class="text-center mt-5">
                        <h3 class="font-semibold">Chọn xếp hạng</h3>
                        <div class="flex justify-center mt-3">
                            <template
                                v-for="i in 5"
                                :key="i"
                            >
                                <StarIcon
                                    class="w-10 h-10 text-yellow-400 cursor-pointer"
                                    :class="{'text-gray-300': i > form.rating}"
                                    @click="form.rating = i"
                                />
                            </template>
                        </div>
                        <InputError :message="form.errors.rating" />
                        <form @submit.prevent="submit" class="mt-5">
                            <textarea
                                v-model="form.content"
                                class="w-full text-sm h-28 border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="Viết đánh giá của bạn"
                            />
                            <InputError :message="form.errors.content" class="text-left" />
                            <button
                                type="submit"
                                class="bg-blue-500 text-sm text-white px-5 py-2 rounded-lg mt-3 hover:bg-blue-700"
                                v-text="form.processing ? 'Đang gửi...' : 'Gửi đánh giá'"
                            />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
