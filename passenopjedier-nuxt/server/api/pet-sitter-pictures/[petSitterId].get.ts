import { defineEventHandler } from "h3";

export default defineEventHandler(async (event) => {
    const petSitterId = getRouterParam(event, 'petSitterId');

    try {   
        const response = await $fetch(`http://localhost/api/pet-sitters/${petSitterId}/pictures`, {})
        return response
    }
    catch (error) {
        return error
    }
})