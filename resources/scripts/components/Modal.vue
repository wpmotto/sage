<template>
    <div :class="$attrs.class">
        <button @click="open = !open">
            <slot name="button"></slot>
        </button>
        <TransitionRoot as="template" :show="open">
            <Dialog as="div" static class="fixed z-20 inset-0 overflow-y-auto" @close="open = false" :open="open">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="inline-block align-bottom bg-white rounded-lg p-2 text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full md:max-w-2xl lg:max-w-3xl relative">
                    <button 
                        class="absolute right-0 top-0 transform translate-x-full p-4 text-white"
                        type="button" 
                        @click="open = false"
                    >
                        <XCircleIcon class="w-6 h-6"></XCircleIcon>
                    </button>
                    <div class="text-center">
                        <DialogTitle v-if="title" as="h3" class="text-lg leading-6 font-medium text-gray-900 sr-only">
                            {{ title }}
                        </DialogTitle>

                        <slot name="body"></slot>
                    </div>
                </div>
                </TransitionChild>
            </div>
            </Dialog>
        </TransitionRoot>
    </div>
</template>

<script>
import { ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XCircleIcon } from '@heroicons/vue/outline'

export default {
  components: {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    XCircleIcon,
  },

  props: {
      title: {
          type: String,
          default: '',
      }, 
  },

  setup( props ) {
    const open = ref(false)

    return {
      open
    }
  },
}
</script>

