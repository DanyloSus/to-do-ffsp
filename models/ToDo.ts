import mongoose from "mongoose";

export const ToDoSchema = new mongoose.Schema(
  {
    title: String,
    description: String,
    completed: Boolean,
  },
  { timestamps: true }
);

const ToDo = mongoose.models.ToDo || mongoose.model("ToDo", ToDoSchema);

export default ToDo;