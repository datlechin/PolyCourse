<script>
import { Link } from '@inertiajs/inertia-vue3'
import { MagnifyingGlassIcon } from '@heroicons/vue/24/solid'

export default {
    components: {
        Link,
        MagnifyingGlassIcon,
    }
}
</script>

<template>
    <nav class="bg-white flex items-center justify-between h-[66px] border-b px-7">
        <div class="flex items-center">
            <Link href="/">
                <img src="https://fullstack.edu.vn/static/media/f8-icon.18cd71cfcfa33566a22b.png" alt="Logo" class="w-[38px] rounded-lg">
            </Link>
            <h4 class="ml-4 font-bold">Học lập trình để đi làm</h4>
        </div>
        <div>
            <div class="flex items-center border-2 border-gray-200 rounded-full h-10 w-[420px] pr-4 pl-2">
                <MagnifyingGlassIcon class="w-5 text-gray-500" />
                <input type="text" placeholder="Tìm kiếm khóa học, bài viết, video, ..." class="border-0 outline-none px-1 w-full">
            </div>
        </div>
        <div>
            <Link href="/login" class="bg-blue-500 text-white px-5 py-2 font-semibold rounded-full hover:bg-blue-600">
                Đăng nhập
            </Link>
        </div>
    </nav>
</template>
