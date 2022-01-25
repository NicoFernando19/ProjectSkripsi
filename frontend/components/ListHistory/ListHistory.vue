<template>
    <div class="list-group">
      <div v-for="history in histories" v-bind:key="history.id" class="list-group-item">
        <div class="d-flex w-100 justify-content-between">
          <h6 class="mb-1">{{ history.start_date }} - {{ history.moreThenNow ? 'Current' : history.end_date }}</h6>
        </div>
        <div class="mb-1">{{ history.Title }}</div>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    histories: []
  }
}
</script>
