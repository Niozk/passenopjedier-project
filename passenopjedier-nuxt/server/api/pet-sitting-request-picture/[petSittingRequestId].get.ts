import { defineEventHandler } from "h3";

export default defineEventHandler(async (event) => {
    const petSittingRequestId = getRouterParam(event, 'petSittingRequestId');

    try {   
        const response = await $fetch(`http://localhost/api/pet-sitting-requests/${petSittingRequestId}/picture`, {})
        return response
    }
    catch (error) {
        return error
    }
})