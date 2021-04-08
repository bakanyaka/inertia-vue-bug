<template>
<guest>
    <div>
        <div class="mt-2 text-right">
            <label class="inline-flex items-center leading-none">
                <input v-model="checkBox" type="checkbox" class="mr-2" />
                <span>Test checkbox</span>
            </label>
        </div>
        <div>
            <div v-for="value in someData" :key="value">
                {{value}}
            </div>
        </div>
    </div>
</guest>
</template>

<script>
    import Guest from "../Layouts/Guest";
    import {ref, watch} from "vue";
    import { Inertia } from '@inertiajs/inertia';
    export default {
        components: {Guest},
        props: {
            someData: {
                type: Array,
                required: true,
            }
        },
        setup() {
            const checkBox = ref(false);
            watch(checkBox, (value) => {
                Inertia.reload({ data: { test: value ? 1 : 0 } });
            });
            return {checkBox}
        }
    }
</script>
