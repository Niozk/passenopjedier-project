import { defineEventHandler, readFormData } from "h3";

export default defineEventHandler(async (event) => {

    const body = await readFormData(event);

    try {   
        const response = await $fetch('http://localhost:80/api/pet-sitters/post', {
            method: 'POST',
            body: body,
        })
        return response
    }
    catch (error) {
        return error
    }
})