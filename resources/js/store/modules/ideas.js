import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  columns: ['id', 'user_id', 'title', 'description', 'type'],
  ideas: [],
  options: {
    headings: {
      id: 'ID',
      user_id: 'User',
      title: 'Title',
      description: 'Description',
      type: 'Type'
    },
    sortable: ['title', 'type'],
    filterable: ['title', 'type']
  }
}

// getters
export const getters = {
  ideas: state => state.ideas
}

// mutations
export const mutations = {
  [types.FETCH_IDEAS] (state, { ideas }) {
    state.ideas = ideas
  }
}

// actions
export const actions = {
  async fetchIdeas ({ commit }) {
    try {
      const { data } = await axios.get('/api/ideas')

      commit(types.FETCH_IDEAS_SUCCESS, { ideas: data })
    } catch (e) {
      commit(types.FETCH_IDEAS_FAILURE)
    }
  }
}
