import { defineEventHandler, getQuery, readFormData } from "h3";

export default defineEventHandler(async (event) => {
    const id = getRouterParam(event, 'id');
    const query = getQuery(event);
    // const body = await readFormData(event);

    try {   
        const response = await $fetch(`http://localhost:80/api/users/${id}`, {
            method: 'PUT',
            // body: body,
            query: query,
        })
        return response
    }
    catch (error) {
        return error
    }
})