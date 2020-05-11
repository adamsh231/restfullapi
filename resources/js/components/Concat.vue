<template>
	<div>
		<table class="table table-striped" id="data_content">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Email</th>
					<th scope="col">Password</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="user in users" v-bind:key="user.id">
					<td>{{ user.id }}</td>
					<td>{{ user.name }}</td>
					<td>{{ user.email }}</td>
				</tr>
			</tbody>
		</table>
		<div class="d-flex justify-content-center">
			<div class="spinner-border" role="status" v-show="isLoad">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			users: [],
			user_data: [],
			isLoad: true,
		};
	},
	created() {
		this.fetchUser("/api/user");
		this.scrolling();
	},
	methods: {
		fetchUser(url) {
			axios.get(url).then(response => {
				this.user_data = response.data;
				var arr_concat = this.users.concat(this.user_data.data);
				this.users = arr_concat;
			});
		},
		scrolling() {
			window.addEventListener("scroll", () => {
				const position =
					window.pageYOffset + document.documentElement.clientHeight;
				const max_position = document.documentElement.scrollHeight;
				const fetch_position = document.documentElement.scrollHeight;
				if (position >= fetch_position && this.user_data.next_page_url) {
					this.fetchUser(this.user_data.next_page_url);
                }else if(!this.user_data.next_page_url){
                    this.isLoad = false;
                }
			});
		}
	}
};
</script>
