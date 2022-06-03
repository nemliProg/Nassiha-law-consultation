import { ref, computed, onMounted, onUnmounted } from "vue";

export const collapsed = ref(true);
export const toggleSidebar = () => { collapsed.value = !collapsed.value };

export const SIDEBAR_WIDTH = 250
export const SIDEBAR_WIDTH_COLLAPSED = 60
export const sidebarWidth = computed(() => `${collapsed.value ? SIDEBAR_WIDTH_COLLAPSED : SIDEBAR_WIDTH}px`)