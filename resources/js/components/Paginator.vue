<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ChevronLeft, ChevronRight } from 'lucide-vue-next'
import { Button } from '@/components/ui/button'

// Laravel Resource Pagination structure
interface Props {
  meta: {
    current_page: number
    last_page: number
    from: number
    to: number
    total: number
    links: any[]
  }
}

defineProps<Props>()

const previous = (links: any[], currentPage: number) => {
  if(currentPage > 1) {
    const previousLink = links[currentPage - 1]
    useForm().get(previousLink.url)
  }
}

const next = (links: any[], currentPage: number, lastPage: number) => {
  if(currentPage < lastPage) {
    const nextLink = links[currentPage + 1]
    useForm().get(nextLink.url)
  }
}
</script>

<template>
  <div class="flex items-center justify-between px-2 py-4">
    <!-- Results Summary -->
    <div class="text-sm text-muted-foreground">
      Showing {{ meta.from }} to {{ meta.to }} of {{ meta.total }} results
    </div>

    <!-- Navigation Buttons -->
    <div class="flex items-center space-x-2">
      <Button
        variant="outline"
        size="sm"
        :disabled="meta.current_page === 1"
        @click="previous(meta.links, meta.current_page)"
      >
        <ChevronLeft class="h-4 w-4 mr-1" />
        Previous
      </Button>

      <div class="flex items-center text-sm font-medium">
        Page {{ meta.current_page }} of {{ meta.last_page }}
      </div>

      <Button
        variant="outline"
        size="sm"
        :disabled="meta.current_page === meta.last_page"
        @click="next(meta.links, meta.current_page, meta.last_page)"
      >
        Next
        <ChevronRight class="h-4 w-4 ml-1" />
      </Button>
    </div>
  </div>
</template>
