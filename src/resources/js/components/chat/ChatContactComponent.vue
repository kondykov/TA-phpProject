<script setup>
const props = defineProps([
    'last_message',
    'contactId',
    'isActive',
    'avatar',
    'name',
])

console.log(props.isActive)
</script>

<template>
  <a class="d-block p-2" :class="{ 'border-radius-lg': isActive, 'bg-gradient-dark': isActive }">
    <div class="d-flex p-2">
      <img alt="Image" :src="avatar" class="avatar shadow">
      <div class="ms-3">
        <div class="justify-content-between align-items-center">
          <h6 class="mb-0" :class="{ 'text-white': isActive }"> {{ name }}
            <span class="badge badge-success"></span>
          </h6>
          <p class="mb-0 text-sm" :class="{ 'text-white': isActive }"> Chat id: {{ last_message }} </p>
        </div>
      </div>
    </div>
  </a>
</template>

