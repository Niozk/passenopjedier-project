import { defineEventHandler } from "h3";

export default defineEventHandler(async (event) => {
    const pictureUrl = getRouterParam(event, 'pictureUrl');

    try {   
        const response = await $fetch(`http://localhost/api/uploads/pet-sitting-request/${pictureUrl}`, {})
        return response
    }
    catch (error) {
        return error
    }
})