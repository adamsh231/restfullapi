<template>
	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Email</th>
					<th scope="col">Password</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="user in users.data" v-bind:key="user.id">
					<td>{{ user.id }}</td>
					<td>{{ user.name }}</td>
					<td>{{ user.email }}</td>
				</tr>
			</tbody>
		</table>
		<button
			class="btn btn-outline-primary"
			v-on:click="fetchUser(users.prev_page_url)"
			v-bind:disabled="!users.prev_page_url"
		>Previous</button>
		<button
			class="btn btn-outline-primary float-right"
			v-on:click="fetchUser(users.next_page_url)"
			v-bind:disabled="!users.next_page_url"
		>Next</button>
	</div>
</template>

<script>
export default {
	data() {
		return {
			users: []
		};
	},
	created() {
		this.fetchUser("/api/user");
	},
	methods: {
		fetchUser(url) {
			axios.get(url).then(response => (this.users = response.data));
		}
	}
};
</script>
