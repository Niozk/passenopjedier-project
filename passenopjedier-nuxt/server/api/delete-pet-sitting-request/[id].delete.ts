import { defineEventHandler } from "h3";

export default defineEventHandler(async (event) => {
    const id = getRouterParam(event, 'id');

    try {   
        const response = await $fetch(`http://localhost/api/pet-sitting-requests/${id}/delete`, {
            method: 'DELETE',
        })
        return response
    }
    catch (error) {
        return error
    }
})