import { combineReducers } from "redux";
import { Job, Criteria } from "../../models/types";
import {
  JobAction,
  FETCH_JOB_STARTED,
  FETCH_JOB_SUCCEEDED,
  FETCH_JOB_FAILED,
  UPDATE_JOB_SUCCEEDED,
  UPDATE_JOB_STARTED,
  UPDATE_JOB_FAILED,
  EDIT_JOB,
  CLEAR_JOB_EDIT,
  CREATE_JOB_SUCCEEDED,
  CREATE_JOB_STARTED,
  CREATE_JOB_FAILED,
} from "./jobActions";
import { mapToObject, getId, deleteProperty } from "../../helpers/queries";

export interface EntityState {
  jobs: {
    byId: {
      [id: number]: Job;
    };
  };
  criteria: {
    byId: {
      [id: number]: Criteria;
    };
  };
  jobEdits: {
    [id: number]: Job;
  };
}

export interface UiState {
  jobUpdating: {
    [id: number]: boolean;
  };
  criteriaUpdating: {
    [id: number]: boolean;
  };
  creatingJob: boolean;
}

export interface JobState {
  entities: EntityState;
  ui: UiState;
}

export const initEntities = (): EntityState => ({
  jobs: { byId: {} },
  criteria: { byId: {} },
  jobEdits: {},
});

export const initUi = (): UiState => ({
  jobUpdating: {},
  criteriaUpdating: {},
  creatingJob: false,
});

export const initState = (): JobState => ({
  entities: initEntities(),
  ui: initUi(),
});

export const entitiesReducer = (
  state = initEntities(),
  action: JobAction,
): EntityState => {
  switch (action.type) {
    case FETCH_JOB_SUCCEEDED:
      return {
        ...state,
        jobs: {
          byId: {
            ...state.jobs.byId,
            [action.payload.job.id]: action.payload.job,
          },
        },
        criteria: {
          byId: {
            ...state.criteria.byId,
            ...mapToObject(action.payload.criteria, getId),
          },
        },
      };
    case CREATE_JOB_SUCCEEDED:
      return {
        ...state,
        jobs: {
          byId: {
            ...state.jobs.byId,
            [action.payload.id]: action.payload,
          },
        },
      };
    case UPDATE_JOB_SUCCEEDED:
      return {
        ...state,
        jobs: {
          byId: {
            ...state.jobs.byId,
            [action.meta.id]: action.payload,
          },
        },
      };
    case EDIT_JOB:
      return {
        ...state,
        jobEdits: {
          ...state.jobEdits,
          [action.payload.id]: action.payload,
        },
      };
    case CLEAR_JOB_EDIT:
      return {
        ...state,
        jobEdits: deleteProperty<Job>(state.jobEdits, action.payload),
      };
    default:
      return state;
  }
};

export const uiReducer = (state = initUi(), action: JobAction): UiState => {
  switch (action.type) {
    case CREATE_JOB_STARTED:
      return {
        ...state,
        creatingJob: true,
      };
    case CREATE_JOB_SUCCEEDED:
    case CREATE_JOB_FAILED:
      return {
        ...state,
        creatingJob: false,
      };
    case FETCH_JOB_STARTED:
    case UPDATE_JOB_STARTED:
      return {
        ...state,
        jobUpdating: {
          [action.meta.id]: true,
        },
      };
    case FETCH_JOB_SUCCEEDED:
    case UPDATE_JOB_SUCCEEDED:
    case FETCH_JOB_FAILED:
    case UPDATE_JOB_FAILED:
      return {
        ...state,
        jobUpdating: {
          [action.meta.id]: false,
        },
      };
    default:
      return state;
  }
};

export const jobsReducer = combineReducers({
  entities: entitiesReducer,
  ui: uiReducer,
});

export default jobsReducer;
